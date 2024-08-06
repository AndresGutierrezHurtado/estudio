using System.Diagnostics;
using Microsoft.AspNetCore.Mvc;
using ejemplo1.Models;

namespace ejemplo1.Controllers;

public class HomeController : Controller
{
    private readonly ILogger<HomeController> _logger;

    public HomeController(ILogger<HomeController> logger)
    {
        _logger = logger;
    }

    public IActionResult Index() {
        ViewBag.username = HttpContext.Session.GetString("UserName");
        ViewBag.password = HttpContext.Session.GetString("UserPassword");
        
        ViewBag.CurrentPage = "Home";

        return View();
    }

    public IActionResult Privacy()
    {
        return View();
    }

    [ResponseCache(Duration = 0, Location = ResponseCacheLocation.None, NoStore = true)]
    public IActionResult Error()
    {
        return View(new ErrorViewModel { RequestId = Activity.Current?.Id ?? HttpContext.TraceIdentifier });
    }
}
