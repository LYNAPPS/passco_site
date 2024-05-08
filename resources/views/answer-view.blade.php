<x-app-layout>
    @foreach ($imagePaths as $imagePath)
        <img src="{{ $imagePath }}" alt="Page Image">
    @endforeach

</x-app-layout>
