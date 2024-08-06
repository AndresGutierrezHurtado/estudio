# Ejemplo guia MVC en ASP.NET

Este es un proyecto ASP.NET Core MVC clonado desde GitHub. Este proyecto sigue el patrón de diseño Modelo-Vista-Controlador (MVC) y está destinado a mostrar una aplicación web básica que incluye ejemplos de controladores, vistas y modelos.

## Descripción

El ejemplo es una aplicación web que utiliza el framework ASP.NET Core MVC. El objetivo de este proyecto es proporcionar una base sólida para desarrollar aplicaciones web siguiendo el patrón MVC, facilitando la separación de preocupaciones y mejorando la mantenibilidad del código.

### Características

- Estructura del proyecto basada en el patrón MVC.
- Implementación de controladores y vistas utilizando Razor.
- Gestión de datos a través de modelos y Entity Framework Core.
- Autenticación y autorización básica.

## Requisitos

Antes de ejecutar este proyecto, asegúrate de tener instalado lo siguiente:

- [.NET SDK](https://dotnet.microsoft.com/download) (versión 8.0 o superior)
- [Visual Studio Code](https://code.visualstudio.com/) (opcional, pero recomendado)
- [Git](https://git-scm.com/)

## Instrucciones de Instalación y Ejecución

Sigue estos pasos para clonar el repositorio, restaurar las dependencias y ejecutar el proyecto:

### 1. Clonar el Repositorio

Primero, clona el repositorio a tu máquina local utilizando el comando `git clone`:

```
git clone https://github.com/AndresGutierrezHurtado/estudio.git
cd estudio/tecnologo/guias-mvc/ejemplo-1
```

### 2. Restaurar Dependencias

A continuación, restaura las dependencias del proyecto utilizando el comando `dotnet restore`. Este comando descarga todas las dependencias necesarias definidas en el archivo `.csproj` del proyecto.

```
dotnet restore
```

### 3. Ejecutar la Aplicación

Finalmente, ejecuta la aplicación utilizando el comando `dotnet run`. Este comando compila y ejecuta la aplicación en el servidor local.

```
dotnet run
```

Una vez que la aplicación esté en ejecución, podrás acceder a ella en tu navegador web segun el link que te muestre en la terminal.

## Estructura del Proyecto

La estructura básica del proyecto es la siguiente:

```
MiProyectoMVC/
├── Controllers/
│   ├── HomeController.cs
│   ├── AuthController.cs
├── Models/
│   ├── UserModel.cs
├── Views/
│   ├── Auth/
│   │   ├── Login.cshtml
│   ├── Home/
│   │   ├── Index.cshtml
│   │   ├── About.cshtml
├── wwwroot/
│   ├── js/
│   ├── logolpng
├── appsettings.Development.json
├── Program.cs
```

### Descripción de Carpetas y Archivos

- **Controllers/**: Contiene los controladores de la aplicación.
- **Models/**: Contiene los modelos de datos de la aplicación.
- **Views/**: Contiene las vistas de la aplicación, organizadas en subcarpetas por controlador.
- **wwwroot/**: Contiene archivos estáticos como CSS, JavaScript e imágenes.
- **appsettings.json**: Archivo de configuración de la aplicación.
- **Program.cs**: Configuración principal del proyecto.
