@extends('layouts.admin')
@section('content')
    <div class="space-y-5 overflow-hidden">
        <div class="grid gap-5 grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            <livewire:components.charts.area element="total_users" route="admin.users.all" title="Users" tooltip="Total Users"
                color="#9061F9"
                icon='<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" /></svg>' />
            <livewire:components.charts.area element="verified_users" route="admin.users.all" title="Verified Users"
                tooltip="Verified Users" color="#55DD92"
                icon='<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
              </svg>' />
            <livewire:components.charts.area element="unverified_users" route="admin.users.all" title="Unverified Users"
                tooltip="Unverified Users" color="#F05252"
                icon='<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m0-10.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.249-8.25-3.286zm0 13.036h.008v.008H12v-.008z" />
              </svg>' />
        </div>

        <div class="grid gap-5 grid-cols-2">
            @can('trade_log')
                <livewire:components.charts.transactions element="trades_report" route="admin.users.all" title="Trades Report"
                    tooltip="Trades" color="#4467EF"
                    icon='<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605" />
              </svg>' />
            @endcan
            @if ($plat->trading->binary_status == 1)
                @can(['binary_practice_log', 'binary_trade_log'])
                    <livewire:components.charts.monthly element="binary_trades" route="admin.users.all"
                        title="Binary Trades Report" :tooltip="['Wins', 'Loses']" :colors="['#22c55e', '#ef4444']"
                        icon='<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" /><path stroke-linecap="round" stroke-linejoin="round" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" /></svg>' />
                @endcan
            @endif
        </div>


        <div class="grid gap-5 grid-cols-2">
            @can('trade_log')
                <livewire:components.charts.monthly-transactions element="deposits" route="admin.users.all" title="Deposits"
                    :tooltip="['Total', 'Fees', 'Completed', 'Pending']" :colors="['#9061F9', '#E74694', '#0E9F6E', '#E3A008']"
                    icon='<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6L9 12.75l4.286-4.286a11.948 11.948 0 014.306 6.43l.776 2.898m0 0l3.182-5.511m-3.182 5.51l-5.511-3.181" /></svg>' />
            @endcan
            @can(['binary_practice_log', 'binary_trade_log'])
                <livewire:components.charts.monthly-transactions element="withdrawals" route="admin.users.all"
                    title="Withdrawals" :tooltip="['Total', 'Fees', 'Completed', 'Pending']" :colors="['#9061F9', '#E74694', '#0E9F6E', '#E3A008']"
                    icon='<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" /></svg>' />
            @endcan
        </div>
    </div>
@endsection
@push('breadcrumb-plugins')
    @can('update_show')
    @endcan
@endpush
@section('vendor-scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@endsection
@section('page-scripts')
    <script>
        function check_update() {
            $('#checkUpdatebtn').prop("disabled", true);
            $('#checkUpdatebtn').addClass("focus:outline-none disabled:opacity-50");
            $('#spinner').removeClass('hidden');
            $.ajax({
                method: "get",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
                url: "{{ route('admin.update.check') }}",
                success: function(response) {
                    notify(response.type, response.message)
                    $('#checkUpdatebtn').prop("disabled", false);
                    $('#checkUpdatebtn').removeClass(
                        "focus:outline-none disabled:opacity-50");
                    $('#spinner').addClass('hidden');
                    window.livewire.emit('refreshDatatable');
                    $('#checkUpdateclose').click();
                },
                error: function(response) {
                    notify(response.type, response.message)
                    $('#checkUpdatebtn').prop("disabled", false);
                    $('#checkUpdatebtn').removeClass(
                        "focus:outline-none disabled:opacity-50");
                    $('#spinner').addClass('hidden');
                    $('#checkUpdateclose').click();
                }
            });
        };
    </script>
@endsection
