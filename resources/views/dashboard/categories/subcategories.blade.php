
<!-- Displaying the current category -->
<ul>
<option value="{{ $category->id }}">
<li > {{ $category->name}}  

    <!-- If category has children -->
    @if (count($category->children) > 0)

        <!-- Create a nested unordered list -->
        <ul value="{{ $category->id }}" >

            <!-- Loop through this category's children -->
            @foreach ($category->children as $sub)

                <!-- Call this blade file again (recursive) and pass the current subcategory to it -->
                @include('dashboard.categories.subcategories', ['category' => $sub])
        
            @endforeach
        </ul>
  
    @endif
</li>
</option>
</ul>