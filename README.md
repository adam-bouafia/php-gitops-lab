# php-gitops-lab

A GitOps delivery pipeline for a PHP-FPM + nginx application: GitLab CI builds
and pushes images, Flux deploys and reconciles them via image automation, and
kube-prometheus-stack monitors the result.

Full write-up and diagrams are being added as the project is built. See the
commit history for the build-up, and `drills/` for break-and-fix exercises
once they land.
