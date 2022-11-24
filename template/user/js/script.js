$(document).ready(function () {
  $("#favs")
    .unbind()
    .click(function () {
      // stop();
      console.log("ea");
      $("#favs").toggleClass("text-[#d7a86e]");
      $("#favs").toggleClass("text-white");
      $('#container').load(
        "ajax/fav.php?iduser=" +
          $("#iduser").val() +
          "&idbaju=" +
          $("#idbaju").val()
      );
    });
  $("#search")
    .unbind()
    .keyup(function () {
      console.log("ea");
      $.get("ajax/search.php?baju=" + $("#search").val(), function (data) {
        $("#Container").html(data);
      });
    });
  $("#tanggal1").click(function () {
    setInterval(() => {
      $("#total_harga").load(
        "ajax/total.php?tanggal1=" +
          $("#tanggal1").val() +
          "&tanggal2=" +
          $("#tanggal2").val() +
          "&harga=" +
          $("#harga").val()
      );
    }, 2000);
  });
  $("#tanggal2").click(function () {
    setInterval(() => {
      $("#total_harga").load(
        "ajax/total.php?tanggal1=" +
          $("#tanggal1").val() +
          "&tanggal2=" +
          $("#tanggal2").val() +
          "&harga=" +
          $("#harga").val()
      );
    }, 2000);
  });
});
