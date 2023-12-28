<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-link-button-green href="{{ route('category.create') }}">create category</x-link-button-green>
                    <div>
                        <x-admin.table>
                            <x-admin.table-header>
                                <x-admin.table-column>Id</x-admin.table-column>
                                <x-admin.table-column>Title</x-admin.table-column>
                                <x-admin.table-column>Slug</x-admin.table-column>
                                <x-admin.table-column></x-admin.table-column>

                                @foreach ($categories as $category)
                                    <x-admin.table-row>
                                        <x-admin.table-column>{{ $category->id }}</x-admin.table-column>
                                        <x-admin.table-column>{{ $category->title }}</x-admin.table-column>
                                        <x-admin.table-column>{{ $category->slug }}</x-admin.table-column>
                                        <x-admin.table-column>
                                            <x-link-button-gray href="{{ route('category.edit', $category) }}">Edit</x-link-button-gray>
                                        </x-admin.table-column>
                                    </x-admin.table-row>
                                @endforeach
                            </x-admin.table-header>
                        </x-admin.table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
