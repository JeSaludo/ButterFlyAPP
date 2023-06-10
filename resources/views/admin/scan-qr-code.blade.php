<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard | OFSTPS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500;600;700&family=Poppins:wght@400;500;700&family=Raleway:ital,wght@0,100;0,400;0,500;0,600;0,700;1,300&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet"> 
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://unpkg.com/@zxing/library@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body class="bg-custom-admin-bg min-h-screen">
    
   
    @include('admin.layout.dashboard-nav')
   
    <section class="main home transition-all duration-300 ease-in">     
        
        @include('admin.layout.dashboard-header-v2', ["title" => "User Management"])   

        <div class="w-9/12 mx-auto text-center my-4 bg-white shadow-md rounded-20">
            <button onclick="startScan()"
                class="w-6/12 mx-auto font-poppins text-2xl text-white bg-custom-blue mt-8 py-2 border-none rounded-md">Scan</button>
            <h1 class="text-2xl my-4 font-poppins font-semibold">QR Code Scanner</h1>
            <div id="myElement" class="mt-8 opacity-0 text-xl text-green-500 font-medium"></div>
           
            <div class="relative ">
                <video id="scanner-video" class="w-[640px] h-[480px] mx-auto text-center mb-4"  style="object-fit: cover;"></video>
                <div id="guide" class="opacity-0 absolute inset-0 flex items-center justify-center">
                    <div class="w-48 h-48 border-4 border-dashed border-white rounded-lg"></div>
                </div>
            </div>
            <button id="stopbtn" onclick="stopScan()" class="w-6/12 opacity-0 mx-auto font-poppins text-2xl text-white bg-custom-red mt-4 py-2 border-none rounded-md">Stop</button>

        </div>
       
    </section>
    <script>
        const videoElement = document.getElementById('scanner-video');
        const codeReader = new ZXing.BrowserMultiFormatReader();
        let isScanning = false; // Track the scanning state
        const guideElement = document.getElementById('guide'); // Get the guide element
        const stopBtn = document.getElementById('stopbtn'); // Get the guide element

        function startScan() {
          if (!isScanning) {

            stopBtn.classList.add('opacity-100');
            stopBtn.classList.remove('opacity-0');
            codeReader.listVideoInputDevices()
              .then(videoInputDevices => {
                let selectedDeviceId;
      
                if (videoInputDevices.length > 1) {
                  // If multiple video input devices are available, prompt the user to select one
                  selectedDeviceId = prompt('Select video input device:', videoInputDevices[0].deviceId);
                } else {
                  selectedDeviceId = videoInputDevices[0].deviceId;
                }
      
                // Start the video stream with the selected device
                codeReader.decodeFromVideoDevice(selectedDeviceId, videoElement, (result, err) => {
                  if (result) {
                    const qrCodeData = result.text;
                    handleQRCode(qrCodeData);
                    stopScan(); // Turn off scanning after successful scan
                    document.getElementById('myElement').classList.add('opacity-100');
                    document.getElementById('myElement').classList.remove('opacity-0');
                    document.getElementById('myElement').innerHTML = "Successfully Used a permit!";

                  }
                  if (err && !(err instanceof ZXing.NotFoundException)) {
                    console.error(err);
                  }
                });
              })
              .catch(err => {
                console.error(err);
              });
      
            isScanning = true; // Set scanning state to true
            guideElement.classList.add('opacity-100');
            guideElement.classList.remove('opacity-0');
          }
        }
      
        function stopScan() {
          codeReader.reset(); // Reset the code reader
          isScanning = false; // Set scanning state to false
          guideElement.classList.remove('opacity-100');
          guideElement.classList.add('opacity-0');
          stopBtn.classList.remove('opacity-100');
          stopBtn.classList.add('opacity-0');
        }
      
        function handleQRCode(qrCodeData) {
          // Send the QR code data to the server to update the status
          fetch('/admin/dashboard/update-status', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify({ application_id: qrCodeData }),
          })
            .then(response => {
              if (response.ok) {
                return response.json();
              } else {
                throw new Error('Network response was not OK.');
              }
            })
            .then(data => {
              console.log(data);
            })
            .catch(error => {
              console.error(error);
            });
        }
    </script>
      
   
    


    @include('admin.layout.admin-script')
    
    
   
   
 
 </body>
 
 </html>
