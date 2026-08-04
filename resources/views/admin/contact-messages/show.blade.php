<x-admin-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h1 class="font-heading text-xl font-bold text-gray-900">Message Details</h1>
            <a href="{{ route('admin.contact-messages.index') }}" class="btn-secondary">
                Back to Messages
            </a>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-sm p-6 sm:p-10">
        <dl class="space-y-6">
            <div>
                <dt class="text-sm font-medium text-gray-500">From</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ $contactMessage->full_name }}</dd>
            </div>

            <div>
                <dt class="text-sm font-medium text-gray-500">Email</dt>
                <dd class="mt-1 text-sm text-gray-900">
                    <a href="mailto:{{ $contactMessage->email }}" class="text-blue-600 hover:underline">{{ $contactMessage->email }}</a>
                </dd>
            </div>

            @if ($contactMessage->phone)
                <div>
                    <dt class="text-sm font-medium text-gray-500">Phone</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $contactMessage->phone }}</dd>
                </div>
            @endif

            <div>
                <dt class="text-sm font-medium text-gray-500">Subject</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ $contactMessage->subject }}</dd>
            </div>

            <div>
                <dt class="text-sm font-medium text-gray-500">Message</dt>
                <dd class="mt-1 text-sm text-gray-900 whitespace-pre-wrap">{{ $contactMessage->message }}</dd>
            </div>

            <div>
                <dt class="text-sm font-medium text-gray-500">Received</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ $contactMessage->created_at->format('d M, Y H:i') }}</dd>
            </div>
        </dl>

        <div class="flex items-center justify-end pt-6 border-t mt-8">
            <button type="button" class="text-red-600 hover:underline text-sm font-medium" onclick="document.getElementById('delete-form').submit();">
                Delete Message
            </button>
        </div>

        <form action="{{ route('admin.contact-messages.destroy', $contactMessage) }}" method="POST" id="delete-form" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </div>
</x-admin-layout>
