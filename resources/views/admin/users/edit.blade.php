<form action="{{ route('admin.users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="firstName">First Name:</label>
    <input type="text" name="firstName" value="{{ $user->first_name }}" />

    <label for="lastName">Last Name:</label>
    <input type="text" name="lastName" value="{{ $user->last_name }}" />

    <label for="wildlifePermit">Wildlife Permit:</label>
    <input type="text" name="wildlifePermit" value="{{ $user->wildlife_permit }}" />

    <label for="businessName">Business Name:</label>
    <input type="text" name="businessName" value="{{ $user->business_name }}" />

    <label for="ownerName">Owner Name:</label>
    <input type="text" name="ownerName" value="{{ $user->owner_name }}" />

    <label for="address">Address:</label>
    <input type="text" name="address" value="{{ $user->address }}" />

    <label for="contact">Contact:</label>
    <input type="text" name="contact" value="{{ $user->contact }}" />

    <label for="email">Email:</label>
    <input type="email" name="email" value="{{ $user->email }}" />

    <button type="submit">Update User</button>
</form>