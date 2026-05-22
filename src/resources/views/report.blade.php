<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Órdenes – cariai_test</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6 md:p-10">

    <div class="max-w-6xl mx-auto space-y-6">

        {{-- Encabezado --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Reporte de Órdenes</h1>
                <p class="text-sm text-gray-400 mt-1">Base de datos: <span class="font-medium text-gray-500">cariai_test</span></p>
            </div>
            <span class="text-xs bg-blue-50 text-blue-600 font-semibold px-3 py-1 rounded-full border border-blue-100">
                reports.local
            </span>
        </div>

        {{-- Tarjetas de resumen --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-5">
                <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">Total Órdenes</p>
                <p class="text-3xl font-bold text-blue-600 mt-1">{{ $totalOrders }}</p>
            </div>
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-5">
                <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">Unidades Vendidas</p>
                <p class="text-3xl font-bold text-indigo-600 mt-1">{{ number_format($totalQuantity) }}</p>
            </div>
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-5">
                <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">Monto Total</p>
                <p class="text-3xl font-bold text-green-600 mt-1">$ {{ number_format($totalAmount, 2) }}</p>
            </div>
        </div>

        {{-- Tabla de órdenes --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100">
                <h2 class="text-base font-semibold text-gray-700">Detalle de Órdenes</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-100 text-sm">
                    <thead>
                        <tr class="bg-gray-50 text-xs uppercase tracking-wider text-gray-500 font-semibold">
                            <th class="px-6 py-3 text-left"># Orden</th>
                            <th class="px-6 py-3 text-left">Cliente</th>
                            <th class="px-6 py-3 text-left">Identificación</th>
                            <th class="px-6 py-3 text-left">Producto</th>
                            <th class="px-6 py-3 text-left">Referencia</th>
                            <th class="px-6 py-3 text-right">Cantidad</th>
                            <th class="px-6 py-3 text-right">Total</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($orders as $order)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 font-medium text-gray-800">{{ $order->OrderId }}</td>
                            <td class="px-6 py-4 text-gray-700">
                                {{ $order->client->Name }} {{ $order->client->LastName }}
                            </td>
                            <td class="px-6 py-4 text-gray-500">{{ $order->client->Identification }}</td>
                            <td class="px-6 py-4 text-gray-700">{{ $order->product->Name }}</td>
                            <td class="px-6 py-4 text-gray-500">{{ $order->product->Reference }}</td>
                            <td class="px-6 py-4 text-right font-medium text-gray-800">
                                {{ number_format($order->Quantity) }}
                            </td>
                            <td class="px-6 py-4 text-right font-semibold text-green-700">
                                $ {{ number_format($order->Total, 2) }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="px-6 py-10 text-center text-gray-400">
                                No hay órdenes registradas.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    @if($orders->isNotEmpty())
                    <tfoot>
                        <tr class="bg-gray-50 font-semibold text-gray-700 border-t-2 border-gray-200">
                            <td colspan="5" class="px-6 py-4 text-right text-xs uppercase tracking-wider text-gray-500">
                                Totales
                            </td>
                            <td class="px-6 py-4 text-right">{{ number_format($totalQuantity) }}</td>
                            <td class="px-6 py-4 text-right text-green-700">$ {{ number_format($totalAmount, 2) }}</td>
                        </tr>
                    </tfoot>
                    @endif
                </table>
            </div>
        </div>

        <p class="text-center text-xs text-gray-400 pb-4">
            Generado el {{ now()->format('d/m/Y H:i') }} &mdash; cariai_test &copy; {{ date('Y') }}
        </p>

    </div>

</body>
</html>
