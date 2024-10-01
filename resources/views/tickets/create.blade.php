@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Create Ticket</h1>

    <form action="{{ route('tickets.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
        @csrf

        <!-- Subject Field -->
        <div class="mb-4">
            <label for="subject" class="block text-gray-700 text-sm font-bold mb-2">Subject</label>
            <input type="text" id="subject" name="subject" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <!-- Description Field -->
        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
            <textarea id="description" name="description" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
        </div>

        <!-- Priority Field -->
        <div class="mb-4">
            <label for="priority" class="block text-gray-700 text-sm font-bold mb-2">Priority</label>
            <select id="priority" name="priority" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                <option value="low">Low</option>
                <option value="medium">Medium</option>
                <option value="high">High</option>
            </select>
        </div>

        <!-- Category Field -->
        <div class="mb-4">
            <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Category</label>
            <select id="category" name="category" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                <option value="bug">Bug</option>
                <option value="feature_request">Feature Request</option>
                <option value="general_inquiry">General Inquiry</option>
            </select>
        </div>

        <!-- Attachment Field -->
        <div class="mb-4">
            <label for="attachment" class="block text-gray-700 text-sm font-bold mb-2">Attachment (Optional)</label>
            <input type="file" id="attachment" name="attachment" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <!-- Submit Button -->
        <div class="mb-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Submit Ticket
            </button>
        </div>
    </form>
</div>
@endsection
