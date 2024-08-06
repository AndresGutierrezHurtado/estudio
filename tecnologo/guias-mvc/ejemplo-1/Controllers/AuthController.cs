using System.Diagnostics;
using Microsoft.AspNetCore.Mvc;
using ejemplo1.Models;

namespace ejemplo1.Controllers;

public class AuthController : Controller
{
    private readonly ILogger<AuthController> _logger;

    public AuthController(ILogger<AuthController> logger)
    {
        _logger = logger;
    }

    public IActionResult Login() {
        ViewBag.CurrentPage = "Login";
        return View();
    }

    [HttpPost]
    public IActionResult Auth(string user, string contra)
    {
        if (ModelState.IsValid)
        {
            if (user == "Ejemplo") {
                if (contra == "1234") {
                    User usuario = new User(user, contra);

                    // Guardar datos en la sesión
                    HttpContext.Session.SetString("UserName", usuario.Username);
                    HttpContext.Session.SetString("UserPassword", usuario.Password);

                    return RedirectToAction("Index", "Home");
                }
                ViewBag.ErrorMessage = "Contraseña no coincide.";
                return View("Login");   
            }
            ViewBag.ErrorMessage = "Usuario no encontrado";
            return View("Login");
        }

        ViewBag.ErrorMessage = "Unknown error";
        return View("Login");
    }

    public IActionResult Logout () {

        HttpContext.Session.Remove("UserName");
        HttpContext.Session.Remove("UserPassword");

        return RedirectToAction("Index", "Home");
        
    }

    [ResponseCache(Duration = 0, Location = ResponseCacheLocation.None, NoStore = true)]
    public IActionResult Error()
    {
        return View(new ErrorViewModel { RequestId = Activity.Current?.Id ?? HttpContext.TraceIdentifier });
    }
}
