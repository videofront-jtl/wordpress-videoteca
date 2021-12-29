# Plugin VideoFront para WordPress

A Videoteca é uma solução de CMS (Content Management System) para publicação e organização de vídeos de forma segura. Possui recursos avançados para armazenamento, controle e entrega de conteúdo audiovisual.

Você poderá integrar ao seu LMS (Learning Management System) e fornecer aos seus alunos uma experiência única e segura.

## A listagem de vídeos
A Videoteca é totalmente organizada por um sistema de pastas customizáveis que auxilia na organização e sistematização do conteúdo do usuário.

##  Qualidade de reprodução
A Videoteca possui suporte nativo a Dynamic Stream. Isso permite que seus vídeos funcionem igual ao Youtube, detectando a banda do usuário e selecionando automaticamente a melhor qualidade de acordo com a internet do usuário.

## E a segurança?
O acesso aos vídeos é por Token HMAC que traz uma segurança elevada. Através dele é gerado um HASH HMAC que é praticamente impossível decifrar.

Gostou e quer testar? [Entre em contato](https://www.videofront.com.br/br/Contato)


## Como usar
1. Fazer o download deste projeto em formato zip e posteriormente fazer o upload dele no ambiente de adicionar um novo plugin de seu wordpress
2. Após instalado, será necessário configurar o plugin com a url (https://[PREFIXO].videotecaead.com.br/) e o token (HMAC-SHA1-seu-token) de sua videoteca
3. Para incorporar seus vídeos em páginas ou posts do wordpress use as seguintes alternativas:
    - **Bloco Shortcode:** [iframe src="videoteca://VIDEO_IDENTIFIER" width="1280" height="720" frameborder="0" allowfullscreen sandbox="allow-scripts allow-same-origin allow-popups" allow=":encrypted-media; :picture-in-picture"]
    - **Bloco HTML:** <iframe src="videoteca://VIDEO_IDENTIFIER" width="1280" height="720" frameborder="0" allowfullscreen sandbox="allow-scripts allow-same-origin allow-popups" allow=":encrypted-media; :picture-in-picture"></iframe>

> 
