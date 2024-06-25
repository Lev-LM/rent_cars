window.addEventListener('alertApplication', (event) => {
    let data = event.detail;

    console.log(data);

    Swal.fire({
      icon: "error",
      title: "Упс...",
      text: "Укажите новую цену!",
      confirmButtonColor: "rgb(0, 80, 191)",
    });
})
