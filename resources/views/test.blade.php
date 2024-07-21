@if($var1 == '1')
    <h1>Giá trị 1</h1>
@elseif($var1 == '2')
    <h1>Giá trị 2</h1>
@endif

@for($i = 0; $i <= 100; $i++)
    <h1>{{ $i }}</h1>
@endfor 

@foreach($var2 as $value)
    {{ $value }}
@endforeach

@switch($var1)
    @case('1')
        <h1>GT1</h1>
        @break
    @case('2')
        <h1>GT2</h1>  
        @break
    @default
        <h1>K có</h1>
        @break
@endswitch