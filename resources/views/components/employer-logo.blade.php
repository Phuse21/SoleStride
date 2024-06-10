@props(['employer', 'width' => '90', 'height' => '90'])
<img src="{{asset($employer->logo)}}" alt="" class="rounded-lg" width="{{ $width }}" height="{{ $height }}">