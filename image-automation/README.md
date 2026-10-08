# image-automation

Two separate credentials are required and are easy to confuse:

1. **Flux's scan credential** - `ImageRepository.spec.secretRef` (`gitlab-registry-flux`,
   in `flux-system`). Lets the image-reflector controller list tags. Create with a
   GitLab deploy token (`read_registry` scope):

   ```bash
   kubectl -n flux-system create secret docker-registry gitlab-registry-flux \
     --docker-server=registry.gitlab.com \
     --docker-username=<deploy-token-username> \
     --docker-password=<deploy-token-password>
   ```

2. **The kubelet's pull credential** - `imagePullSecret` referenced from
   `apps/php-app/helmrelease.yaml` (`gitlab-registry`, in the `php-app` namespace).
   Lets the kubelet actually pull the images:

   ```bash
   kubectl -n php-app create secret docker-registry gitlab-registry \
     --docker-server=registry.gitlab.com \
     --docker-username=<deploy-token-username> \
     --docker-password=<deploy-token-password>
   ```

One working does not mean the other works - drill 4 and drill 5 in `drills/` break
each independently.

Flux also needs a Git deploy key with **write** access to push the automation
commit, e.g. `flux bootstrap gitlab --read-write-key ...` (see repo root README
for the full bootstrap command).

Neither secret is ever committed to this repo.
