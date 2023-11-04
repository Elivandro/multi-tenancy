<x-app-layout>
    <div class="flex flex-col items-center justify-center p-8">
        <div
            class="relative flex max-w-2xl h-full w-full flex-col rounded-[10px] border-[1px] border-gray-200 bg-white bg-clip-border shadow-md shadow-[#F3F3F3] dark:border-[#ffffff33] dark:!bg-navy-800 dark:shadow-none">

            <div class="w-full px-4 overflow-x-scroll md:overflow-x-hidden">
                <table role="table" class="w-full min-w-[500px] overflow-x-scroll">
                    <thead>
                        <tr role="row">
                            <th colspan="1" role="columnheader" title="Toggle SortBy">
                                <div
                                    class="flex items-center justify-between pt-4 pb-2 tracking-wide text-gray-600 uppercase text-start sm:text-xs lg:text-xs">
                                    Logo
                                </div>
                            </th>
                            <th colspan="1" role="columnheader" title="Toggle SortBy">
                                <div
                                    class="flex items-center justify-between pt-4 pb-2 tracking-wide text-gray-600 uppercase text-start sm:text-xs lg:text-xs">
                                    Domain
                                </div>
                            </th>
                            <th colspan="1" role="columnheader" title="Toggle SortBy">
                                <div
                                    class="flex items-center justify-between pt-4 pb-2 tracking-wide text-gray-600 uppercase text-start sm:text-xs lg:text-xs">
                                    Name
                                </div>
                            </th>
                            <th colspan="1" role="columnheader" title="Toggle SortBy">
                                <div
                                    class="flex items-center justify-between pt-4 pb-2 tracking-wide text-gray-600 uppercase text-start sm:text-xs lg:text-xs">
                                    Description
                                </div>
                            </th>
                            <th colspan="1" role="columnheader" title="Toggle SortBy">
                                <div
                                    class="flex items-center justify-between pt-4 pb-2 tracking-wide text-gray-600 uppercase text-start sm:text-xs lg:text-xs">
                                    Email
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody role="rowgroup" class="px-4">
                        @forelse($tenants as $tenant)
                            @foreach($tenant->domains as $domains)
                                <tr role="row">
                                    <td class="py-3 text-sm" role="cell">
                                        <div class="flex items-center gap-2">
                                            <img src="{{ $tenant->logo }}" class="rounded-full w-9 h-9" alt="" />
                                        </div>
                                    </td>
                                    <td class="py-3 text-sm" role="cell">
                                        <p class="text-sm font-medium text-navy-700">
                                            <a href="http://{{ $domains->domain }}" target="_blank">
                                                {{ $domains->domain }}
                                            </a>
                                        </p>
                                    </td>
                                    <td class="py-3 text-sm" role="cell">
                                        <p class="font-medium text-gray-600 text-md">
                                            {{ $tenant->name }}
                                        </p>
                                    </td>
                                    <td class="py-3 text-sm" role="cell">
                                        <p class="font-medium text-gray-600 text-md">
                                            {{ $tenant->description }}
                                        </p>
                                    </td>
                                    <td class="py-3 text-sm" role="cell">
                                        <p class="font-medium text-gray-600 text-md">
                                            {{ $tenant->email }}
                                        </p>
                                    </td>
                                </tr>
                            @endforeach
                        @empty
                            <tr role="row">
                                <td class="py-3 text-sm text-center" colspan="4" role="cell">Nenhum registro tenant</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div
        class="min-h-screen bg-gray-100 bg-center sm:flex sm:justify-center sm:items-center bg-dots-darker dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div class="flex items-center justify-center w-screen h-screen bg-white">
            <div class="container px-4 my-4 lg:px-20">

                <form action="{{ route('home') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="w-full p-8 mx-auto my-4 shadow-2xl md:px-12 lg:w-9/12 lg:pl-20 lg:pr-40 rounded-2xl">
                        <div class="flex">
                            <h1 class="text-5xl font-bold uppercase">nova empresa</h1>
                        </div>
                        <div class="grid grid-cols-1 gap-5 mt-5 md:grid-cols-2">
                            <div class="flex flex-col">
                                <input
                                    class="w-full p-3 mt-2 text-gray-900 bg-gray-100 rounded-lg focus:outline-none focus:shadow-outline border-2 @error('id') border-red-600 @enderror"
                                    type="text" name="id" placeholder="id" />
                                <x-input-error :messages="$errors->get('id')" class="mt-2 font-semibold" />
                            </div>
                            <div class="flex flex-col">
                                <input
                                    class="w-full p-3 mt-2 text-gray-900 bg-gray-100 rounded-lg focus:outline-none focus:shadow-outline border-2 @error('name') border-red-600 @enderror"
                                    type="text" name="name" placeholder="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2 font-semibold" />
                            </div>
                            <div class="flex flex-col">
                                <input
                                    class="w-full p-3 mt-2 text-gray-900 bg-gray-100 rounded-lg focus:outline-none focus:shadow-outline border-2 @error('email') border-red-600 @enderror"
                                    type="email" name="email" placeholder="email" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2 font-semibold" />
                            </div>
                            <div class="flex flex-col">
                                <div class="flex items-center justify-center w-full mt-2 bg-grey-lighter">
                                    <label
                                        class="flex items-center justify-center w-full px-4 py-1.5 tracking-wide uppercase bg-white border-2 rounded-lg shadow-lg cursor-pointer text-blue border-blue hover:bg-blue hover:text-gray-600 @error('logo') border-red-600 @enderror">
                                        <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                        </svg>
                                        <span class="ml-2 text-base leading-normal">Select a logo</span>
                                        <input type='file' name="logo" class="hidden" />
                                    </label>
                                </div>
                                <x-input-error :messages="$errors->get('logo')" class="mt-2 font-semibold" />
                            </div>
                        </div>
                        <div class="my-4">
                            <textarea name="description" placeholder="description"
                                class="w-full h-32 p-3 mt-2 text-gray-900 bg-gray-100 rounded-lg resize-none focus:outline-none focus:shadow-outline border-2 @error('description') border-red-600 @enderror"></textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2 font-semibold" />
                        </div>
                        <div class="w-1/2 my-2 lg:w-1/4">
                            <button
                                class="w-full p-3 text-sm font-bold tracking-wide text-gray-100 uppercase bg-blue-900 rounded-lg focus:outline-none focus:shadow-outline">
                                Registrar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
