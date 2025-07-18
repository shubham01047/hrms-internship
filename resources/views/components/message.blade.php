 @if (Session::has('success'))
     <div class="bg-green-200 p-4">
         {{ Session::get('success') }}
     </div>
 @endif
 @if (Session::has('error'))
     <div class="bg-red-200 p-4">
         {{ Session::get('error') }}
     </div>
 @endif
