<div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">ID</th>
            <th class="border px-4 py-2 text-left">User</th>
            <th class="border px-4 py-2 text-left">Due Date</th>
            <th class="border px-4 py-2 text-left">Amount</th>
            <th class="border px-4 py-2 text-left">Paid</th>
            <th class="border px-4 py-2 text-left">Due</th>
            <th class="border px-4 py-2 text-left">Action</th>
        </tr>
        @foreach ($invoices as $invoice)
            <tr>
                <td class="border px-4 py-2">{{ $invoice->id }}</td>
                <td class="border px-4 py-2">{{ $invoice->user->name }}</td>
                <td class="border px-4 py-2 text-center">{{ date('F j ,Y', strtotime($invoice->due_date)) }}</td>
                <td class="border px-4 py-2 text-center">${{ $invoice->amount()['total'] }}</td>
                <td class="border px-4 py-2 text-center">${{ $invoice->amount()['paid'] }}</td>
                <td class="border px-4 py-2 text-center">${{ $invoice->amount()['due'] }}</td>
                <td class="border px-4 py-2 text-center">
                    <div class="flex">
                        <a class="me-2" href="{{ route('invoice-show', $invoice->id) }}">@include('components.icons.show')</a>
                        <a class="me-2" href="">@include('components.icons.edit')</a>
                        <form onsubmit="return confirm('are you sure?')" wire:submit.prevent="invoiceDelete({{ $invoice->id }})">
                            <button type="submit">@include('components.icons.delete')</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="mt-4">
        {{ $invoices->links() }}
    </div>
