<?php

namespace CLI;


use mysql_xdevapi\Exception;

class ProjectBuilder
{
    public function __construct()
    {
    }

    const controllerDir = '\Controller';
    const entityDir = '\Entity';
    const repositoryDir = '\Repository';
    const formDir = '\Form';
    public function Create(string $location, $name) {
        $project_location = trim($location) . trim('\ ') . trim($name);
        fwrite(STDOUT, $project_location);
        //make directory for the project
        mkdir($project_location);
        //initialize project
        mkdir($project_location . self::controllerDir);
        mkdir($project_location . self::entityDir);
        mkdir($project_location . self::repositoryDir);
        mkdir($project_location . self::repositoryDir);
        mkdir($project_location . self::formDir);
        //add project config file to project dir
        $this->createConfig($project_location);

    }

    private function createConfig(string $project_location) {
        $newLocation = str_replace(trim('\ '),'\\',$project_location);
        $configFileContent = [
            "projectDir" => $newLocation,
            "DB_username" => "replace me",
            "DB_host" => "replace me",
            "DB_name" => "replace me"
        ];

        $configFileName = $project_location . '\config.json';
        try {
            file_put_contents($configFileName ,json_encode($configFileContent,JSON_PRETTY_PRINT));
        } catch (Exception $e) {
            fwrite(STDOUT, "problem creating config file:" . $e);
        }


    }
}