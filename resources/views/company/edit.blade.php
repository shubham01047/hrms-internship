<x-app-layout>
    <h1>Edit Company Details</h1>

    @if (session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif
    @if (session('error'))
        <p style="color:red">{{ session('error') }}</p>
    @endif

    <form action="{{ route('company.update', $company->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Company Name:</label><br>
        <input type="text" name="company_name" value="{{ old('company_name', $company->company_name) }}"><br><br>

        <label>Company Description:</label><br>
        <textarea name="company_description">{{ old('company_description', $company->company_description) }}</textarea><br><br>

        <label>Company Logo:</label><br>
        @if ($company->company_logo)
            <p>Current Logo:</p>
            <div
                style="background-color:#434343; padding:10px; display:inline-block; border:1px solid #ccc; margin-bottom:10px;">
                <img src="{{ asset('images/' . $company->company_logo) }}" alt="Company Logo"
                    style="max-height:100px; display:block;">
            </div>
        @endif
        <input type="file" name="company_logo"><br><br>
        <label>Navbar Color:</label><br>
        <input type="color" name="navbar_color"
            value="{{ old('navbar_color', $company->navbar_color ?? '#000000') }}"><br><br>
        <label>Sidebar Color:</label><br>
        <input type="color" name="sidebar_color"
            value="{{ old('sidebar_color', $company->sidebar_color ?? '#000000') }}"><br><br>
        <label>Primary Color:</label><br>
        <input type="color" name="primary_color"
            value="{{ old('primary_color', $company->primary_color ?? '#000000') }}"><br><br>
        <label>Text Color:</label><br>
        <input type="color" name="text_color"
            value="{{ old('text_color', $company->text_color ?? '#000000') }}"><br><br>
        <label>Footer Color:</label><br>
        <input type="color" name="footer_color"
            value="{{ old('footer_color', $company->footer_color ?? '#000000') }}"><br><br>
        <label>System Title:</label><br>
        <input type="text" name="system_title" value="{{ old('system_title', $company->system_title) }}"><br><br>
        <button type="submit">Update</button>
        <a href="{{ url()->previous() }}">Back</a>
    </form>
</x-app-layout>
