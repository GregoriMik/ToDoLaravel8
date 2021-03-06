<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('/todos/css/app.css') }}">
    <title>To do app</title>
  </head>
  <body>
      {{-- wraper --}}
                <main class="wraper d-flex flex-column align-item-center justify-content-center ">

                    {{-- form --}}
                    <form action="{{ route('create') }}" method="POST" class="todos-form d-flex align-items-center justify-items-center flex-wrap shadow-sm">
                        @csrf

                        @if (session()->has('success'))
                        <div class="alert alert-success text-capitalize rounded-0 mb-3 w-100">
                            {{ session()->get('success') }}
                        </div>
                            
                        @endif
                        <input type="text" name="todo" class="@error('todo') border border-danger @enderror form-control rounded-0"placeholder="enter">
                        <button class="btn btn-primary d-flex align-item-center justify-content-center text-capital">Add</button>
                    
                        @error('todo')
                            {{-- error message --}}
                            <div class="alert w-100 alert-danger text-capitalize rounded-0 mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </form>
                    {{-- form --}}
                    
                    
                        
                    
                    <div class="todos-list mt-3">
                            {{-- todos item --}}
                            {{-- todos list --}}
                            @foreach ($todos as $todo)
                            <div class="item d-flex align-items-center shadow flex-wrap">
                                <p class="text p-0 m-0 text-capitalize">{{ $todo->todo }}</p>
                            
                            {{-- actions --}}
                            <div class="actions d-flex align-items-center w-100 mt-3 pt-3 border-top">

                                {{-- update --}}
                                <a href="{{ route('update',['id' => $todo->id ]) }}" class="btn btn-primary rounded-0 me-2 d-flex align-items-center justify-content-center text-capitalize text-decoration-none flex-wrap">update</a>
                                {{-- delete-todo --}}
                                <form action="{{ route('delete', ['id'=> $todo->id]) }}"method="POST"class="delete-todo-form">
                                    @csrf
                                    <button class="btn btn-danger rounded-0 me-2 text-capitalize d-flex align-items-center">delete</button>
                                </form> 
                            </div>
                        </div>
                    
                        @endforeach

                        @if ($todos->count() <= 0)
                            <div class="alert alert-into text-capitalize rounded-0 shadow">No todos found, create some.</div>
                        @endif
                    </div>
                </main>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>
