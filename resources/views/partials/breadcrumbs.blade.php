 {{-- resources/views/partials/breadcrumbs.blade.php --}}

 @unless ($breadcrumbs->isEmpty())

 <div class="breadcrumb">
     @foreach ($breadcrumbs as $breadcrumb)

         @if (!is_null($breadcrumb->url) && !$loop->last)
         <span class="font-weight-semibold"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></span>
         @else
           
             <span class="font-weight-semibold">{{ $breadcrumb->title }}</span>
             <a href="user_pages_profile_tabbed.html" class="breadcrumb-item">{{ $breadcrumb->title }}</a>
         @endif

     @endforeach
    </div>
@endunless



