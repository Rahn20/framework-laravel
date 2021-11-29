<h3>Yatzy-protokoll</h3>
<table>
    <tr>
        <th></th>
        <th>Spelare</th> 
    </tr>
    <tr>
        <td>Ettor</td>
        <td>  {{ Session::get('yatzy.dice_0') }} </td>
    </tr>
    <tr>
        <td>Tvåor</td>
        <td> {{ Session::get('yatzy.dice_1') }} </td>
    </tr>
    <tr>
        <td>Treor</td>
        <td> {{ Session::get('yatzy.dice_2') }} </td>
    </tr>
    <tr>
        <td>Fyror</td>
        <td> {{ Session::get('yatzy.dice_3')}} </td>
    </tr>
    <tr>
        <td>Femmor</td>
        <td> {{ Session::get('yatzy.dice_4') }} </td>
    </tr>
    <tr>
        <td>Sexor</td>
        <td> {{ Session::get('yatzy.dice_5') }} </td>
    </tr>
    <tr>
        <td><b>Summa </b></td>
        <td> {{ Session::get('yatzy.sum') }} </td>
    </tr>

    <tr>
        <td><b>Bonus </b></td>
        <td>  {{ Session::get('yatzy.bonus') }}</td>
    </tr>

</table>