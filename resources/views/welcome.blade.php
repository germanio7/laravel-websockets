<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <title>Chat</title>
</head>
<body>
    <form method="POST" action="{{route('messages.store')}}" enctype="multipart/form-data" class="w-full max-w-sm">
        @csrf
      <div class="flex-1 p:2 sm:p-6 justify-between flex flex-col h-screen">
        <div id="messages" class="flex flex-col space-y-4 p-3 overflow-y-auto scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2 scrolling-touch">
            @foreach ($messages ?? [] as $item)
                @if ($item->sender_id == 1)
                    <div class="chat-message">
                        <div class="flex items-end">
                        <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
                            <div><span class="px-4 py-2 rounded-lg inline-block rounded-bl-none bg-gray-300 text-gray-600">{{ $item->content }}</span></div>
                        </div>
                        </div>
                    </div>
                @else 
                    <div class="chat-message">
                        <div class="flex items-end justify-end">
                        <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-end">
                            <div><span class="px-4 py-2 rounded-lg inline-block bg-gray-300 text-gray-600">{{ $item->content }}</span></div>
                        </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="border-t-2 border-gray-200 px-4 pt-4 mb-2 sm:mb-0">
           <div class="relative flex">
              <span class="absolute inset-y-0 flex items-center">
                 <button type="button" class="inline-flex items-center justify-center rounded-full h-12 w-12 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
                    
                 </button>
              </span>
              <input name="content" type="text" placeholder="Write Something" class="w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 pl-12 bg-gray-200 rounded-full py-3">
              <div class="absolute right-0 items-center inset-y-0 hidden sm:flex">
                 <button type="submit" class="inline-flex items-center justify-center rounded-full h-12 w-12 transition duration-500 ease-in-out text-white bg-blue-500 hover:bg-blue-400 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6 transform rotate-90">
                       <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path>
                    </svg>
                 </button>
              </div>
           </div>
        </div>
     </div>

    </form> 
     
     <style>
     .scrollbar-w-2::-webkit-scrollbar {
       width: 0.25rem;
       height: 0.25rem;
     }
     
     .scrollbar-track-blue-lighter::-webkit-scrollbar-track {
       --bg-opacity: 1;
       background-color: #f7fafc;
       background-color: rgba(247, 250, 252, var(--bg-opacity));
     }
     
     .scrollbar-thumb-blue::-webkit-scrollbar-thumb {
       --bg-opacity: 1;
       background-color: #edf2f7;
       background-color: rgba(237, 242, 247, var(--bg-opacity));
     }
     
     .scrollbar-thumb-rounded::-webkit-scrollbar-thumb {
       border-radius: 0.25rem;
     }
     </style>
     
     <script>
         const el = document.getElementById('messages')
         el.scrollTop = el.scrollHeight
     </script>
</body>
</html>