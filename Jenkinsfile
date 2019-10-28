pipeline {
    agent any
    environment {
        DOCKER_IMAGE_NAME = "prindustry/wordpress"
    }

    stages {
        stage('Build Docker Image') {
            when {
                branch 'master'
            }
            steps {
                script {
                    app = docker.build(DOCKER_IMAGE_NAME)
                    app.inside {
                        sh 'echo Hello, DevApp Wordpress!'
                    }
                }
            }
        }


        stage('Push Docker Image') {
            when {
                branch 'master'
            }
            steps {
                script {
                    docker.withRegistry('https://registry.hub.docker.com', 'docker_hub_login') {
                        app.push("${env.BUILD_NUMBER}")
                        app.push("latest")
                    }
                }
            }
        }


        stage('DeployToDevelopment') {
            when {
                branch 'development'
            }
            steps {
                input 'Deploy to development?'
                kubernetesDeploy(
                    kubeconfigId: 'kubeconfig',
                    configs: 'devapp.yml',
                    enableConfigSubstitution: true
                )
            }
        }

        stage('DeployToProduction') {
            when {
                branch 'production'
            }
            steps {
                input 'Deploy to Production?'
                milestone(1)
                kubernetesDeploy(
                    kubeconfigId: 'kubeconfig',
                    configs: 'prodapp.yml',
                    enableConfigSubstitution: true
                )
            }
        }
    }
}
