<?php

namespace CLI;
class main {
    private ProjectBuilder $builder;

    public function __construct(
        ProjectBuilder $builder
    )
    {
        $this->builder = $builder;
    }

    public function new() {
        fwrite(STDOUT, "Project location:");
        $project_location = fgets(STDIN);
        fwrite(STDOUT, "Project name:");
        $project_name = fgets(STDIN);
        $this->builder->Create($project_location,$project_name);
    }
}
