{{- define "php-app.fullname" -}}
{{- .Release.Name -}}
{{- end -}}

{{- define "php-app.labels" -}}
app.kubernetes.io/name: {{ include "php-app.fullname" . }}
app.kubernetes.io/instance: {{ .Release.Name }}
app.kubernetes.io/managed-by: {{ .Release.Service }}
{{- end -}}

{{- define "php-app.selectorLabels" -}}
app.kubernetes.io/name: {{ include "php-app.fullname" . }}
app.kubernetes.io/instance: {{ .Release.Name }}
{{- end -}}
