<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Greeting -->
            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl p-4">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                    Welcome back
                </h3>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Quick overview of your tasks.
                </p>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-4 flex flex-col">
                    <span class="text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">Total Tasks</span>
                    <span class="mt-1 text-2xl font-bold text-indigo-600 dark:text-indigo-400">{{ $stats['total'] ?? 0 }}</span>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-4 flex flex-col">
                    <span class="text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">Completed</span>
                    <span class="mt-1 text-2xl font-bold text-green-600 dark:text-green-400">{{ $stats['completed'] ?? 0 }}</span>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-4 flex flex-col">
                    <span class="text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400">Pending</span>
                    <span class="mt-1 text-2xl font-bold text-yellow-600 dark:text-yellow-400">{{ $stats['pending'] ?? 0 }}</span>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-4">
                <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">Quick Actions</h4>
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('tasks.create') }}" class="px-4 py-2 rounded-lg text-sm font-medium bg-indigo-600 text-white hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-600 transition">
                        + New Task
                    </a>
                    <a href="{{ route('tasks.index') }}" class="px-4 py-2 rounded-lg text-sm font-medium bg-gray-100 text-gray-700 hover:bg-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 transition">
                        View All
                    </a>
                </div>
            </div>

            <!-- Recent Tasks -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow overflow-hidden">
                <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200 dark:border-gray-700">
                    <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300">Recent Tasks</h4>
                    <a href="{{ route('tasks.index') }}" class="text-xs text-indigo-600 dark:text-indigo-400 hover:underline">
                        See all
                    </a>
                </div>
                <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($tasks ?? [] as $task)
                        <li class="px-4 py-3 flex items-start justify-between hover:bg-gray-50 dark:hover:bg-gray-700/50 transition">
                            <div class="pr-4 flex-1 min-w-0">
                                <p class="text-sm font-semibold text-gray-900 dark:text-gray-100 truncate">{{ $task->title }}</p>
                                <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400 truncate">
                                    {{ Str::limit($task->description, 60) }}
                                </p>
                            </div>
                            <div class="flex items-center gap-2 flex-shrink-0">
                                @if($task->is_done)
                                    <span class="px-2 py-0.5 text-xs rounded-md bg-green-100 text-green-700 dark:bg-green-900/40 dark:text-green-300">Done</span>
                                @else
                                    <span class="px-2 py-0.5 text-xs rounded-md bg-yellow-100 text-yellow-700 dark:bg-yellow-900/40 dark:text-yellow-300">Pending</span>
                                @endif
                                <a href="{{ route('tasks.edit', $task) }}" class="text-xs px-2 py-0.5 rounded bg-indigo-100 text-indigo-700 hover:bg-indigo-200 dark:bg-indigo-900/40 dark:text-indigo-300 dark:hover:bg-indigo-800/50 transition">
                                    Edit
                                </a>
                            </div>
                        </li>
                    @empty
                        <li class="px-4 py-6 text-center text-sm text-gray-500 dark:text-gray-400">
                            No tasks yet. <a href="{{ route('tasks.create') }}" class="text-indigo-600 dark:text-indigo-400 hover:underline">Create one</a>.
                        </li>
                    @endforelse
                </ul>
            </div>

        </div>
    </div>
</x-app-layout>