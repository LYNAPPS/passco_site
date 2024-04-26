<x-app-layout>
    <x-form-section>
        <form action="#" class="account-form">
            <div class="account-form-item mb-20">
                <div class="account-form-label">
                    <label>Your Full Name</label>
                </div>
                <div class="account-form-input">
                    <input type="text" placeholder="Enter Your Full Name">
                </div>
            </div>

            <div class="account-form-item mb-20">
                <div class="account-form-label">
                    <label>Your Level</label>
                </div>
                <div class="account-form-input">
                    <select class="form-control">
                        <option value="">Select Your Level</option>
                        <option value="">Form 1</option>
                        <option value="">Form 2</option>
                        <option value="">Form 3</option>
                    </select>
                </div>
            </div>

            <div class="account-form-button">
                <button type="submit" class="account-btn">Download</button>
            </div>
        </form>
    </x-form-section>
</x-app-layout>
