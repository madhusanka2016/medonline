@foreach($order as $Custom)
<tr>

    <td><b>Customer Name</b></td>
    <td>{{$Custom->user}}</td>
    <td><b>Telephone No</b></td>
    <td>{{$Custom->telno}}</td>
</tr>

<tr>

    <td style="width: 150px"><b>Job Type</b></td>
    <td style="width: 150px">{{$Custom->jobtype}}</td>
    <td style="width: 150px"><b>Invoice No</b></td>
    <td style="width:150px">{{$Custom->invoiceno}}</td>


</tr>
<tr>
    <td><b>Device serial no</b></td>
    <td>{{$Custom->Serialno}}</td>
    <td><b>Device </b></td>
    <td>{{$Custom->device}}</td>
</tr>
<tr>
    <td><b>Condition</b></td>
    <td>{{$Custom->Condition}}</td>
    <td><b>Problem</b></td>
    <td>{{$Custom->Problem}}</td>
</tr>
<tr>
    <td><b>Price</b></td>
    <td>{{$Custom->price}}</td>
    <td><b>Total time</b></td>
    <td>{{$Custom->totaltime}}</td>


</tr>
<tr>
    <td><b>Order Date</b></td>
    <td>{{$Custom->orderdate}}</td>
    <td><b>Delivery Date</b></td>
    <td>{{$Custom->deleverdate}}</td>
</tr>
<tr>
    <td><b>Status</b></td>
    <td>{{$Custom->status}}</td>
    </td>
</tr>


@endforeach
