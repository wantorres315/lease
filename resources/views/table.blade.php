<table id="tabela">
            <thead>
                <tr>
                    <th>Model</th>
                    <th>Ram</th>
                    <th>HDD</th>
										<th>Location</th>
										<th>Price</th>
                </tr>
            </thead>
            <tbody>
								@foreach($data as $bcp)
                <tr>
                    <td>{{$bcp->model}}</td>
                    <td>{{$bcp->ram}}</td>
                    <td>{{$bcp->hdd}}</td>
										<td>{{$bcp->location->name}}</td>
										<td>{{$bcp->price}}</td>
                </tr>
								@endforeach
               
            </tbody>
        </table>