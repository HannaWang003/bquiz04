// JavaScript Document
function lof(x) {
  location.href = x;
}
function login(table) {
  $.get(
    "./api/chk_ans.php",
    {
      ans: $("#ans").val(),
    },
    (chk) => {
      if (parseInt(chk) == 0) {
        alert("對不起，您輸入的驗證碼有誤，請您重新登入");
      } else {
        $.post(
          "./api/chk_pw.php",
          {
            table,
            acc: $("#acc").val(),
            pw: $("#pw").val(),
          },
          (res) => {
            if (parseInt(res) == 0) {
              alert("帳號或密碼錯誤,請重新輸入");
            } else {
              switch (table) {
                case "mem":
                  url = "index.php";
                  break;
                case "admin":
                  url = "back.php";
                  break;
              }
              location.href = url;
            }
          }
        );
      }
    }
  );
}
//刪除功能
function del(table, id) {
  $.post(
    "./api/del.php",
    {
      table,
      id,
    },
    () => {
      location.reload();
    }
  );
}
