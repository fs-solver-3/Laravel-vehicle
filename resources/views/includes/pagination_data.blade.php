@foreach($transactions as $transaction)
    <tr>
        <td style="width: 200px">
        <div>{{ $transaction->created_at}}</div>
        </td>
        <td class="mobile-invisible">{{ $transaction->comment}}</td>
        <td>
            <div class="sum positive">{{ $transaction->amount}}
                <div class="mobile-visible">{{ $transaction->amount}}</div>
            </div>
        </td>
        <td class="mobile-invisible">
            <span class="balance">{{ $transaction->balance}}</span>
        </td>
        <td>
            <span class="status">{{ $transaction->state}}</span>
        </td>
    </tr>
@endforeach