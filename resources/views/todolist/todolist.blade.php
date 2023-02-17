<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
</head>




<body>
    <!-- Section: Design Block -->
    <section class="background-radial-gradient overflow-hidden vh-100">
        <style>
            .divider:after,
            .divider:before {
                content: "";
                flex: 1;
                height: 1px;
                background: hsl(218, 41%, 25%);
            }

            .h-custom {
                height: calc(100% - 73px);
            }

            @media (max-width: 450px) {
                .h-custom {
                    height: 100%;
                }
            }

            .background-radial-gradient {
                background-color: hsl(218, 41%, 15%);
                background-image: radial-gradient(650px circle at 0% 0%,
                        hsl(218, 41%, 35%) 15%,
                        hsl(218, 41%, 30%) 35%,
                        hsl(218, 41%, 20%) 75%,
                        hsl(218, 41%, 19%) 80%,
                        transparent 100%),
                    radial-gradient(1250px circle at 100% 100%,
                        hsl(218, 41%, 45%) 15%,
                        hsl(218, 41%, 30%) 35%,
                        hsl(218, 41%, 20%) 75%,
                        hsl(218, 41%, 19%) 80%,
                        transparent 100%);
            }

            #radius-shape-1 {
                height: 120px;
                width: 120px;
                top: -50px;
                left: -10px;
                background: radial-gradient(#44006b, #ad1fff);
                overflow: hidden;
            }

            #radius-shape-2 {
                height: 120px;
                width: 120px;
                top: -50px;
                left: 550px;
                background: radial-gradient(#44006b, #ad1fff);
                overflow: hidden;
            }

            #radius-shape-1-2 {
                height: 140px;
                width: 140px;
                top: -120px;
                left: -70px;
                background: radial-gradient(#44006b, #ad1fff);
                overflow: hidden;
            }

            #radius-shape-2-2 {
                height: 140px;
                width: 140px;
                top: -120px;
                left: 590px;
                background: radial-gradient(#44006b, #ad1fff);
                overflow: hidden;
            }


            #radius-shape-1-3 {
                height: 160px;
                width: 160px;
                top: -200px;
                left: -120px;
                background: radial-gradient(#44006b, #ad1fff);
                overflow: hidden;
            }

            #radius-shape-2-3 {
                height: 160px;
                width: 160px;
                top: -200px;
                left: 640px;
                background: radial-gradient(#44006b, #ad1fff);
                overflow: hidden;
            }

            .bg-glass {
                background-color: hsla(0, 0%, 100%, 0.9) !important;
                backdrop-filter: saturate(200%) blur(25px);
                border-top-left-radius: 75px;
                border-top-right-radius: 75px;
            }
        </style>

        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path
                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </symbol>
        </svg>

        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-5">
                @if (isset($error))
                    <div class="row">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                aria-label="Danger:">
                                <use xlink:href="#exclamation-triangle-fill" />
                            </svg>
                            <strong>{{ $error }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    </div>
                @endif
                <div class="">
                    <form method="post" action="/logout">
                        @csrf
                        <button class="w-15 btn btn-lg btn-danger" type="submit">Sign Out</button>
                    </form>
                </div>
                <div class="col-lg-6 text-center text-lg-start">
                    <h1 class="display-4 fw-bold lh-1 mb-3 text-white">Todo List</h1>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div id="radius-shape-1-3" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-1-2" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2-3" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2-2" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute rounded-circle shadow-5-strong"></div>

                    <div class="bg-glass">
                        <div class="card-body px-4 py-5 px-md-5">
                            <form method="post" action="/todoList">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="todo" placeholder="todo">
                                    <label for="todo">Todo</label>
                                </div>
                                <button class="w-100 btn btn-lg text-white"
                                    style="background-color: hsl(218, 41%, 25%);" type="submit">Add Todo</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- disini --}}
            <div class="row align-items-right g-lg-5 py-5">
                <div class="mx-auto">
                    <form id="deleteForm" method="post" style="display: none">
                        @csrf
                    </form>
                    <table class="table table-striped text-white">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Todo</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($todoList as $todo)
                                <tr class="text-white">
                                    <th scope="row" class="text-white">{{ $todo['id'] }}</th>
                                    <td class="text-white">{{ $todo['todo'] }}</td>
                                    <td>
                                        <form action="/todoList/{{ $todo['id'] }}/delete" method="POST">
                                            @csrf
                                            <button class="w-100 btn btn-lg btn-danger" type="submit">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <footer>
            {{-- Footer Social Media --}}
        </footer>

    </section>
    <!-- Section: Design Block -->
</body>

</html>
