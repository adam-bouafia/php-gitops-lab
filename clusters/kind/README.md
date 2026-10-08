# clusters/kind

`infrastructure.yaml`, `apps.yaml`, and `image-automation.yaml` are Flux
Kustomization custom resources (`kustomize.toolkit.fluxcd.io`) - entry points
that tell Flux which paths in this repo to reconcile. They are hand-authored
and live in Git.

`flux-system/` is **not** hand-authored. It is generated once by running
`flux bootstrap` against a real cluster, and holds the Flux controllers
themselves plus the GitRepository source these Kustomizations reference:

```bash
flux bootstrap github \
  --owner=adam-bouafia \
  --repository=php-gitops-lab \
  --branch=main \
  --path=clusters/kind \
  --personal \
  --read-write-key
```

`--read-write-key` is required because `image-automation/imageupdateautomation.yaml`
pushes commits back into this repo.

Before applying anything here against a live cluster, confirm the API
versions this cluster actually serves:

```bash
flux version
kubectl api-resources | grep toolkit.fluxcd.io
kubectl get crd | grep monitoring.coreos.com
```
