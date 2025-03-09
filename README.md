# <div align="center">🚀 TrinsyCa Composer Plugin 🚀</div>

<div align="center">

Welcome to the Trinsyca Composer Plugin project!<br>
Please choose your preferred language:

[<kbd> <br> English <br> </kbd>][EN]
[<kbd> <br> Turkish <br> </kbd>][TR]

[TR]: README.tr.md
[EN]: https://github.com/TrinsyCa/Docker/?tab=readme-ov-file#-trinsyca-docker-setup-
</div>

## What is this project for? 🤔

- **This project provides a Composer plugin for seamless Docker setup in PHP projects.**

- **It automatically integrates frontend, backend, or full-stack Docker configurations.**

- **You can execute simple commands to set up or remove Docker configurations without hassle!**

## Installation 🚀

**To integrate this plugin into your project, simply run the following command:**

```bash
composer require trinsyca/trinsy
```

**This will install the plugin and register the necessary Composer scripts in your project.**

## Available Commands ⚙️

**Once installed, use the following Composer commands to manage Docker configurations:**

### ✅ Setup Frontend Docker:

- ```bash
  composer trinsy:docker-frontend
  ```

### ✅ Setup Backend Docker:

- ```bash
  composer trinsy:docker-backend
  ```

### ✅ Setup Fullstack Docker (Frontend & Backend):

- ```bash
  composer trinsy:docker-fullstack
  ```

### ❌ Remove Docker Setup:

- ```bash
  composer trinsy:docker-remove
  ```

## How It Works 🔧

- **Frontend Setup**: Adds Docker configurations for frontend development.

- **Backend Setup**: Adds Docker configurations for backend services, including databases and APIs.

- **Fullstack Setup**: Combines both frontend and backend configurations into a unified Docker environment.

- **Remove Setup**: Allows you to safely remove Docker files from your project when no longer needed.

## Notes 📌

**This plugin automatically registers its scripts within your composer.json file.**

**If you need to re-register the scripts, run:**

```bash
composer dump-autoload
```

**Before removing Docker files, you will be prompted with a confirmation.**

## License 📜

**This project is licensed under the MIT License.**

## Contributors ❤️

**We welcome contributions! Feel free to open an issue or submit a pull request.**

📩 For support, contact us via GitHub issues.
