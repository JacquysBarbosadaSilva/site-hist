document.addEventListener("DOMContentLoaded", function() {
    const iconePerfil = document.getElementById("iconePerfil"); // Ícone do meio da página
    const uploadImagem = document.getElementById("uploadImagem");
    const perfilIconeNavbar = document.querySelector(".perfil-icone"); // Ícone na navbar

    // Evento ao clicar na imagem para abrir o seletor de arquivo
    iconePerfil.addEventListener("click", function() {
        uploadImagem.click();
    });

    // Evento ao selecionar uma imagem
    uploadImagem.addEventListener("change", function() {
        const arquivo = uploadImagem.files[0];
        if (arquivo) {
            const formData = new FormData();
            formData.append("imagem", arquivo);

            // Envia a imagem ao backend usando fetch
            fetch("perfil.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.message === "Imagem salva com sucesso!") {
                    // Cria uma URL temporária da nova imagem
                    const novaImagemUrl = URL.createObjectURL(arquivo);

                    // Atualiza os ícones com a nova imagem
                    iconePerfil.src = novaImagemUrl;
                    perfilIconeNavbar.src = novaImagemUrl;
                } else {
                    alert("Falha ao salvar a imagem.");
                }
            })
            .catch(error => {
                console.error("Erro ao enviar a imagem:", error);
            });
        }
    });
});

// Seleciona os elementos necessários
const menuToggle = document.getElementById('menu-toggle');
const menuConteudo = document.querySelector('.menu_conteudo');

// Adiciona um evento para alternar o estado do menu
menuToggle.addEventListener('change', () => {
    if (menuToggle.checked) {
        // Abre o menu
        menuConteudo.style.left = '0';
    } else {
        // Fecha o menu
        menuConteudo.style.left = '-250px';
    }
});

// Define o estilo inicial do menu
menuConteudo.style.position = 'fixed';
menuConteudo.style.top = '0';
menuConteudo.style.left = '-250px';
menuConteudo.style.width = '250px';
menuConteudo.style.height = '100%';
menuConteudo.style.background = '#f8f8f8';
menuConteudo.style.boxShadow = '2px 0 5px rgba(0, 0, 0, 0.3)';
menuConteudo.style.transition = 'left 0.3s ease';
menuConteudo.style.zIndex = '1000';

