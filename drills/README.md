# Drills

Break-and-fix exercises against the pipeline below. Each completed drill gets
its own `NN-short-name.md` file in this folder, written up as:

```markdown
# Drill NN: <name>
**Hop:** <pipeline hop number and name>
**Break:** exact change made (diff or command)
**Symptom:** what a user or operator would see
**Detection:** which alert / Flux event / command showed it, and how long it took
**Diagnosis:** commands run, in order, with the key line of output
**Root cause:** the mechanism, in two or three sentences
**Fix:** the Git change, and how recovery was confirmed
**Prevention:** what guardrail would have stopped or caught it earlier
```

## Catalog

| # | Break | Hop | Teaches | Status |
|---|---|---|---|---|
| 1 | Push a tag that does not match the ImagePolicy regex | 4 | policies filter silently; regex + extract | planned |
| 2 | Remove the setter marker from the HelmRelease | 5 | automation edits only marked lines, no error | planned |
| 3 | Make the Git deploy key read-only | 5 | automation needs write; reading still works | planned |
| 4 | Delete the registry secret used by ImageRepository | 3 | scan auth is separate from pull auth | planned |
| 5 | Delete the app namespace imagePullSecret | 9 | ImagePullBackOff, kubelet credentials | planned |
| 6 | Commit invalid chart values (wrong type) | 8 | HelmRelease failure, remediation, rollback | planned |
| 7 | `kubectl scale` / edit the Deployment by hand | 7-8 | drift: Kustomization vs HelmRelease driftDetection | planned |
| 8 | Set `fastcgi_pass` to the wrong port | 9 | 502, reading nginx error log | planned |
| 9 | Change nginx `root` so it no longer matches php-fpm's path | 9 | "Primary script unknown", SCRIPT_FILENAME | planned |
| 10 | `pm.max_children = 1` plus a load test | 9, 12 | saturation, 504s, max-children alert | planned |
| 11 | Point the readiness probe at a wrong path | 10 | Ready vs Running, endpoints, 503 | planned |
| 12 | Set a memory limit far too low | 9 | OOMKilled, restart alert | planned |
| 13 | Remove the `release` label from the ServiceMonitor | 11 | selector mechanics, `absent()` alert | planned |
| 14 | Break PromQL syntax in the PrometheusRule | 12 | admission webhook rejection vs silently unloaded | planned |
| 15 | `flux suspend helmrelease php-app`, then push a change | 8 | suspended objects, why it needs an alert | planned |
| 16 | Commit-back without `[ci skip]` in a mono-repo | 1, 5 | the CI loop | planned |

Pipeline hop reference (see root `README.md` for the full diagram):

```
1 CI build  2 registry  3 ImageRepository  4 ImagePolicy  5 ImageUpdateAutomation
6 GitRepository  7 Kustomization  8 HelmRelease  9 Deployment/Pods  10 Service
11 ServiceMonitor  12 PrometheusRule
```
