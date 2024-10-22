<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>Личный кабинет</title>
  <style>
    body {
      font-family: "Roboto", sans-serif; 
    }
    .container {
      max-width: 1200px;
      margin: auto;
      margin-top: 8rem;
      background-color: rgb(236, 195, 202);
      padding: 4rem;
    }
    h1 {
      text-align: center;
      font-size: 2rem;
      color: rgb(114, 8, 8);
    }
    p {
      font-size: 1.5rem;
      padding: 1rem;
      color: rgb(190, 3, 3);
      font-weight: bold;
    }
    input {
      font-size: 1.5rem;
      padding: 0.5rem;
    }
    p > span:nth-child(1) {
      font-style: italic;
    }
    .edit-btn {
      padding: 0.5rem 1rem 0.5rem 1rem;
      cursor: pointer;
      color: white;
      background-color: rgb(190, 3, 3);
      border-color: rgb(190, 3, 3);
      border-radius: 5px;
      font-weight: normal;
      margin-left: 1rem;
    }
    .edit-btn:hover {
      background-color: rgb(100, 3, 3);
      border-color: rgb(100, 3, 3);
    }
    .cancel-btn {
      padding: 0.5rem 1rem 0.5rem 1rem;
      cursor: pointer;
      color: white;
      background-color: rgb(190, 3, 3);
      border-color: rgb(190, 3, 3);
      border-radius: 5px;
      font-weight: normal;
      margin-left: 1rem;
    }
    .cancel-btn:hover {
      background-color: rgb(100, 3, 3);
      border-color: rgb(100, 3, 3);
    }
    .save-btn {
      padding: 0.5rem 1rem 0.5rem 1rem;
      cursor: pointer;
      color: white;
      background-color: rgb(190, 3, 3);
      border-color: rgb(190, 3, 3);
      border-radius: 5px;
      font-weight: normal;
      margin-left: 1rem;
    }
    .save-btn:hover {
      background-color: rgb(100, 3, 3);
      border-color: rgb(100, 3, 3);
    }
    .exit-btn {
      cursor: pointer;
      display: block;
      color: white;
      background-color: rgb(190, 3, 3);
      border-color: rgb(190, 3, 3);
      border-radius: 5px;
      font-weight: normal;
      padding: 1rem 2rem 1rem 2rem;
      margin-top: 2rem;
      max-width: fit-content;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Личный кабинет пользователя</h1>
    <p>id:
      <span>
        <?php echo $_SESSION["id"]; ?>
      </span>
    </p>
    <p>Имя:
      <span>
        <?php echo $_SESSION["name"]; ?>
      </span>
      <span class="edit-btn">Изменить</span>
      <span class="cancel-btn" hidden>Отменить</span>
      <span class="save-btn" hidden data-item="name">Сохранить</span>
    </p>
    <p>Фамилия:
      <span>
        <?php echo $_SESSION["lastname"]; ?>
      </span>
      <span class="edit-btn" >Изменить</span>
      <span class="cancel-btn" hidden>Отменить</span>
      <span class="save-btn" hidden data-item="lastname">Сохранить</span>
    </p>
    <p>email:
      <span>
        <?php echo $_SESSION["email"]; ?>
      </span>
    </p>
  </div>
  <a class="exit-btn" href="<?php echo 'php/exit.php'; ?>">Покинуть кабинет</a>
  <script>
    let edit_buttons = document.querySelectorAll(".edit-btn");
    let cancel_buttons = document.querySelectorAll(".cancel-btn");
    let save_buttons = document.querySelectorAll(".save-btn");
   

    for (let i = 0; i < edit_buttons.length; i++) {
      let inputValue = edit_buttons[i].previousElementSibling.innerText;

      edit_buttons[i].addEventListener("click", () => {
        edit_buttons[i].previousElementSibling.innerHTML = `<input type="text" Value ="${inputValue}">`;
        edit_buttons[i].hidden = true;
        cancel_buttons[i].hidden = false;
        save_buttons[i].hidden = false;
      })

      cancel_buttons[i].addEventListener("click", () => {
        edit_buttons[i].previousElementSibling.innerText = inputValue;
        edit_buttons[i].hidden = false;
        cancel_buttons[i].hidden = true;
        save_buttons[i].hidden = true;
      })

      save_buttons[i].addEventListener('click', async () => {
        let newInputValue = edit_buttons[i].previousElementSibling.firstElementChild.value;

        edit_buttons[i].previousElementSibling.innerText = newInputValue;
        edit_buttons[i].hidden = false;
        cancel_buttons[i].hidden = true;
        save_buttons[i].hidden = true;
        let data = new FormData();
        data.append("value", newInputValue);
        data.append("item", save_buttons[i].dataset.item);
        let response = await fetch("php/lk_obr.php", {
          method: "POST",
          body: data,
        });
      })
    }


 
  </script>
</body>
</html>