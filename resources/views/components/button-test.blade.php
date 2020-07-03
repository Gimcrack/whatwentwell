<div class="flex flex-col bg-gray-100 h-screen antialiased leading-none items-center space-y-4 mt-12">

@foreach([
    'Normal' => '',
    'Outline' => 'btn-outline',
    '3d' => 'btn-3d',
    'Pill' => 'btn-pill',
    'Gradient' => 'btn-gradient',
    'Pill Gradient' => 'btn-pill btn-gradient',
    'Disabled' => 'disabled'
] as $style => $class)

    <h1>{{$style}}</h1>

    @foreach(['red','orange','yellow','green','teal','blue','indigo','purple','pink','gray'] as $color)

        <div class="flex space-x-4">

            @foreach(['btn-xs','btn-sm','btn-base','btn-lg','btn-xl'] as $size)
                <div class="flex space-x-4 items-center">
                    <button class="btn {{$size}} {{$class}} btn-{{$color}}">Button</button>
                </div>
            @endforeach
        </div>
    @endforeach

@endforeach
</div>
