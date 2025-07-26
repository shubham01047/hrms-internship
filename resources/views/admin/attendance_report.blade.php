<x-app-layout>
    @can('attendance report')
        <x-slot name="header">
            <h2>
                Attendance Report
            </h2>
        </x-slot>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Punch In</th>
                        <th>Punch Out</th>
                        <th>Total Working Time</th>
                        <th>Breaks Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($attendances as $attendance)
                        <tr>
                            <td>{{ $attendance['name'] }}</td>
                            <td>{{ $attendance['punch_in'] }}</td>
                            <td>{{ $attendance['punch_out'] }}</td>
                            <td>{{ $attendance['total_working_hours'] }}</td>
                            <td>
                                @if (!empty($attendance['breaks']) && count($attendance['breaks']) > 0)
                                    <ul>
                                        @foreach ($attendance['breaks'] as $break)
                                            <li>
                                                {{ $break['type'] ?? 'Break' }} —
                                                {{ is_numeric($break['duration']) ? gmdate('H:i:s', $break['duration']) : $break['duration'] }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>No Breaks</p>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>No attendance records for today.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    @endcan
</x-app-layout>
