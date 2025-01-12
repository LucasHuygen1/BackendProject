<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Drinks Overview -->
    <div>
        <div>
            <div>
                <div>
                    <h3>Our Drinks</h3>

                    <!-- Drinks Grid -->
                    <div>
                        @foreach($drinks as $drink)
                            <div>
                                <!-- Drink Image -->
                                @if($drink->image)
                                    <img src="{{ asset('storage/' . $drink->image) }}" alt="{{ $drink->name }}">
                                @else
                                    <div>
                                        <span>No Image</span>
                                    </div>
                                @endif
                                
                                <!-- Drink Details -->
                                <div>
                                    <h4>{{ $drink->name }}</h4>
                                    <p>€{{ number_format($drink->price, 2) }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
