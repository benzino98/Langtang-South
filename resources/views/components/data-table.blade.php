{{--
    Data Table Component

    A responsive, styled data table for the admin CMS.
    Accepts headers and renders slotted rows.

    @props
        - headers (array): An array of column header strings.
--}}
@props([
    'headers' => [],
])

<div class="overflow-x-auto bg-white rounded-xl shadow-sm">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                @foreach($headers as $header)
                    <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        {{ $header }}
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            {{ $slot }}
        </tbody>
    </table>
</div>
