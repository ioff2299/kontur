<!DOCTYPE html>
<html lang="">
<head>
    <title>Contact Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        #successMessage {
            display: none;
            text-align: center;
            margin-top: 10px;
        }

        #formContainer {
            text-align: center;
        }

        form {
            display: inline-block;
            width: 300px;
        }

        label {
            display: flex;
        }

        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div id="formContainer">
    <div class="alert alert-success text-center" style="display: none;" id="successMessage">
        Ваше сообщение успешно отправлено! Спасибо.
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form id="contactForm" method="post" action="{{ route('contact.store') }}" class="mt-3">
        @csrf
        <label for="name">Имя:</label>
        <input type="text" name="name" id="name" class="form-control" required>
        <div class="error-message" id="nameError" style="display: none;"></div>
        <br>

        <label for="phone">Телефон:</label>
        <input type="text" name="phone" id="phone" class="form-control" required>
        <div class="error-message" id="phoneError" style="display: none;"></div>
        <br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" class="form-control" required>
        <div class="error-message" id="emailError" style="display: none;"></div>
        <br>

        <button type="submit" class="btn btn-success btn-block">Отправить</button>
    </form>
</div>

<script>
    document.getElementById('contactForm').addEventListener('submit', function (e) {
        e.preventDefault();

        document.querySelectorAll('.error-message').forEach(function(element) {
            element.style.display = 'none';
            element.innerHTML = '';
        });

        axios.post('{{ route("contact.store") }}', new FormData(this))
            .then(response => {
                console.log(response.data.message);
                document.getElementById('contactForm').reset();
                document.getElementById('successMessage').style.display = 'block';
                setTimeout(function () {
                    document.getElementById('successMessage').style.display = 'none';
                }, 5000);
            })
            .catch(error => {
                if (error.response.status === 422) {
                    for (const key in error.response.data.errors) {
                        if (error.response.data.errors.hasOwnProperty(key)) {
                            const errorElement = document.getElementById(key + 'Error');
                            if (errorElement) {
                                errorElement.innerHTML = error.response.data.errors[key][0];
                                errorElement.style.display = 'block';
                            }
                        }
                    }
                } else {
                    console.error(error.response.data.error);
                }
            });
    });
</script>
</body>
</html>
