

@props(['message', 'type'=>"info"])

@if ($message)
  @if($type === "danger")
    <div {{ $attributes->merge(['class' => "p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"]) }} role="alert">
    <span class="font-medium">Alerta!</span> 
    {{ $message }}
  </div>
  @else
    <div {{ $attributes->merge(['class' =>"p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"])}} role="alert">
      <span class="font-medium">Alerta!</span> {{ $message }}
    </div>
  @endif
@endif
