
const addBtn  = document.querySelector(".add");

const input = document.querySelector(".inp-group");


function removeInput(){
    this.parentElement.remove();
}

let counter = 0;
function addInput(){
   
    counter++;
    const name = document.createElement("input");
    name.type="text";
    name.className = "w-full block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
    name.placeholder = "Enter Butterfly"
    name.name = "butterfly_name[]" //+ counter
    const amount = document.createElement("input");
    amount.type="number";
    amount.className = "w-full block mt-2 text-custom-dark-500 placeholder:text-custom-dark-500 bg-transparent border-custom-dark-500 border-2 p-1.5 rounded-md"
    amount.placeholder = "Enter Quantity"
    amount.name = "butterfly_quantity[]"// + counter

    const btn=document.createElement("a");
    btn.className = "delete text-white border-custom-dark-500 border-2 p-1.5 rounded-md mt-2 cursor-pointer";
    btn.innerHTML = "DELETE";

    btn.addEventListener("click", removeInput);

    const flex=document.createElement("div");
    flex.className = "grid grid-flow-col gap-2";

    input.appendChild(flex);
    flex.appendChild(name);
    flex.appendChild(amount);
    flex.appendChild(btn);
}

addBtn.addEventListener("click", addInput);