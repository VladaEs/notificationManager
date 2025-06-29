

<select wire:model.live="companyId" wire:change="updatedCompanyId"
    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700  dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <option value="0" class="bg-white text-gray-900">None</option>
    @foreach ($dataArr as $item)
    
        <option value="{{ $item['id'] }}" class="bg-white text-gray-900">
            {{ $item[$textValueName] }}
        </option>
    @endforeach
    <select>
