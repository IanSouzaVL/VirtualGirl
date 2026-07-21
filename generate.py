import requests

url = "http://localhost:11434/api/generate"

dados = {
    "model": "llama3.1:8b-instruct-q4_K_M",
    "prompt": "Olá",
    'stream': False
}

try:
    r = requests.post(url, json=dados, timeout=60)
    r.raise_for_status()

    resposta = r.json()["response"]
    print(resposta)

except requests.RequestException as e:
    print(f"Erro: {e}")
