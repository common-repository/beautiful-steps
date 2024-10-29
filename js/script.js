jQuery(function ($) {
  $(".bts-color-text").wpColorPicker();

  $(".btn-donate").click((e) => {
    e.preventDefault();
    const id = e.currentTarget.attributes["for"].value;
    const curCss = $(`#${id}`).css("display");
    if (curCss === "none") {
      $(`#${id}`).css({
        display: "flex",
      });
    } else {
      $(`#${id}`).css({
        display: "none",
      });
    }
  });

  $(".bts-btn-img").click((e) => {
    e.preventDefault();
    const id = e.target.id;
    const arr = id.split("-");
    const stepIndex = arr[2];
    const itemIndex = arr[3];
    const selectedImage = $(`#bts-img-${stepIndex}-${itemIndex}`);
    const custom_uploader = wp
      .media({
        title: "Chọn hình ảnh",
        library: {
          type: "image",
        },
        button: {
          text: "Chọn hình ảnh",
        },
        multiple: false,
      })
      .on("select", function () {
        // it also has "open" and "close" events
        const attachment = custom_uploader
          .state()
          .get("selection")
          .first()
          .toJSON();
        selectedImage.attr("src", attachment.url);

        // beautiful_steps_settings[list][0][step][0][icon]
        $(
          "[name='beautiful_steps_settings[list][" +
            stepIndex +
            "][step][" +
            itemIndex +
            "][icon]']"
        ).val(attachment.url);
      })
      .open();
  });

  $(".btn-delete").click((e) => {
    e.preventDefault();

    const confirmationText = $("#step-delete-confirmation").val();
    const index = +e.currentTarget.attributes["index"].value;
    const r = confirm(`${confirmationText} Step ${index + 1}`);
    if (!r) return;
    const container = $(".bts-container");
    const currentLength = container.children().length;
    if (currentLength <= 1) return;
    const translatedText = {
      stepTitle: $("#step-title").val(),
      stepBgColor: $("#step-bg-color").val(),
      stepIconColor: $("#step-icon-color").val(),
      chooseImage: $("#step-choose-img").val(),
      post: $("#step-post").val(),
      description: $("#step-description").val(),
      buttonText: $("#step-button-text").val(),
      delete: $("#step-delete").val(),
    };
    const sessionPosts = $("#btsPosts")
      .text()
      .split("+?+")
      .reduce((res, post) => {
        const agrs = post.split("?+");
        if (agrs.length === 2) {
          const name = agrs[0].trim();
          const url = agrs[1].trim();
          res.push(`<option value="${url}">${name}</option>`);
        }
        return res;
      }, []);
    $("#bts-number-of-steps").val(currentLength - 1);

    let currentIndex = 0;
    let newItems = Array.from([]);
    let newStep = null;
    const result = Array.from([]);

    for (let i = 0; i < currentLength; i++) {
      if (i !== index) {
        newItems = Array.from([]);
        for (let j = 0; j < 3; j++) {
          const item = {
            url: $(`#item-url-${i}-${j}`).val(),
            description: $(`#item-description-${i}-${j}`).val(),
            buttonTitle: $(`#item-btn-title-${i}-${j}`).val(),
            image: $(`#bts-img-${i}-${j}`).attr("src"),
          };
          newItems.push(`
            <div class="bts-guild-item">
                <div class="bts-flex bts-flex--center">
                    <label class="bts-lb" for="beautiful_steps_settings[list][${currentIndex}][step][${j}][url]">${
            translatedText.post
          }</label>
                    <select name="beautiful_steps_settings[list][${currentIndex}][step][${j}][url]" value="${
            item.url
          }">
                        ${sessionPosts.join("")}
                    </select>
                </div>

                <div class="bts-flex bts-flex--center">
                    <label class="bts-lb" for="beautiful_steps_settings[list][${currentIndex}][step][${j}][description]">${
            translatedText.description
          }</label>
                    <input type="text" name="beautiful_steps_settings[list][${currentIndex}][step][${j}][description]" class="bts-text w-200" value="${
            item.description
          }" />
                </div>

                <div class="bts-flex bts-flex--center">
                    <label class="bts-lb" for="beautiful_steps_settings[list][${currentIndex}][step][${j}][btn-title]">${
            translatedText.buttonText
          }</label>
                    <input type="text" name="beautiful_steps_settings[list][${currentIndex}][step][${j}][btn-title]" class="bts-text w-200" value="${
            item.buttonTitle
          }" />
                </div>

                <div class="bts-img-selector">
                    <input type="hidden" value="https://scontent-sin6-1.xx.fbcdn.net/v/t1.0-1/c32.0.148.148a/p148x148/138316091_101872231896837_4751573829277292643_n.png?_nc_cat=107&ccb=3&_nc_sid=1eb0c7&_nc_ohc=QhwzWHkG1L8AX-ZbiE_&_nc_ht=scontent-sin6-1.xx&_nc_tp=30&oh=b5ec1f8a6da8d4e2397cd99c64a2fe9e&oe=605C7EA7" name="beautiful_steps_settings[list][${currentIndex}][step][${j}][icon]">
                    <button class="bts-btn-img" id="bts-btn-${currentIndex}-${i}">${
            translatedText.chooseImage
          }</button>
                    <img id="bts-img-${currentIndex}-${j}" src="${
            item.image
          }" alt="" class="bts-img">
                </div>
            </div>
          `);
        }

        const step = {
          title: $(`#step-title-${i}`).val(),
          bgColor: $(`#step-bg-color-${i}`).val(),
          iconColor: $(`#step-icon-color-${i}`).val(),
        };

        newStep = `
          <div class="bts-step">
            <div class="bts-flex bts-flex--center">
                <label class="bts-lb" for="beautiful_steps_settings[list][${currentIndex}][title]">${
          translatedText.stepTitle
        }</label>
                <input type="text" name="beautiful_steps_settings[list][${currentIndex}][title]" class="bts-text full-width max-w-500" value="${
          step.title
        }" />
            </div>

            <div class="bts-flex bts-flex--center">
                <label class="bts-lb" for="beautiful_steps_settings[list][${currentIndex}][bg-color]">${
          translatedText.stepBgColor
        }</label>
                <input type="text" name="beautiful_steps_settings[list][${currentIndex}][bg-color]" class="bts-text w-100 bts-color-text" value="${
          step.bgColor
        }" data-default-color="#E1EEF6"/>
            </div>

            <div class="bts-flex bts-flex--center">
                <label class="bts-lb" for="beautiful_steps_settings[list][${currentIndex}][icon-color]">${
          translatedText.stepIconColor
        }</label>
                <input type="text" name="beautiful_steps_settings[list][${currentIndex}][icon-color]" class="bts-text w-100 bts-color-text" value="${
          step.iconColor
        }" data-default-color="#adcfe4"/>
            </div>

            <div class="bts-guild-box">
              ${newItems.join("")}
            </div>

            <div>
              <a href="javascript:void(0)" index="${currentIndex}" class="bts-btn bts-btn--error btn-delete">${
          translatedText.delete
        } ${currentIndex + 1}</a>
          </div>
          </div>
        `;

        result.push(newStep);
        currentIndex++;
      }
    }
    container.html(result.join(" "));
    $("#bts-save").trigger("click");
  });

  $("#btn-add-step").click((e) => {
    e.preventDefault();
    const container = $(".bts-container");
    if (!container) {
      alert(
        "Có lỗi xảy ra. Vui lòng liên hệ với admin hoặc phía nhà phát triển!"
      );
      return;
    }
    const currentLength = container.children().length;
    const translatedText = {
      stepTitle: $("#step-title").val(),
      stepBgColor: $("#step-bg-color").val(),
      stepIconColor: $("#step-icon-color").val(),
      chooseImage: $("#step-choose-img").val(),
      post: $("#step-post").val(),
      description: $("#step-description").val(),
      buttonText: $("#step-button-text").val(),
      delete: $("#step-delete").val(),
    };
    const nextIndex = currentLength; // Sử dụng length hiện tại để làm nextIndex
    const sessionPosts = $("#btsPosts")
      .text()
      .split("+?+")
      .reduce((res, post) => {
        const agrs = post.split("?+");
        if (agrs.length === 2) {
          const name = agrs[0].trim();
          const url = agrs[1].trim();
          res.push(`<option value="${url}">${name}</option>`);
        }
        return res;
      }, []);

    // Cài đặt lại số lượng steps
    $("#bts-number-of-steps").val(currentLength + 1);
    // Cài đặt các thông tin items mới (default)
    const newItems = Array.from([]);

    for (let i = 0; i < 3; i++) {
      newItems.push(`
        <div class="bts-guild-item">
            <div class="bts-flex bts-flex--center">
                <label class="bts-lb" for="beautiful_steps_settings[list][${nextIndex}][step][${i}][url]">${
        translatedText.post
      }</label>
                <select name="beautiful_steps_settings[list][${nextIndex}][step][${i}][url]">
                    ${sessionPosts.join("")}
                </select>
            </div>

            <div class="bts-flex bts-flex--center">
                <label class="bts-lb" for="beautiful_steps_settings[list][${nextIndex}][step][${i}][description]">${
        translatedText.description
      }</label>
                <input type="text" name="beautiful_steps_settings[list][${nextIndex}][step][${i}][description]" class="bts-text w-200" value="" />
            </div>

            <div class="bts-flex bts-flex--center">
                <label class="bts-lb" for="beautiful_steps_settings[list][${nextIndex}][step][${i}][btn-title]">${
        translatedText.buttonText
      }</label>
                <input type="text" name="beautiful_steps_settings[list][${nextIndex}][step][${i}][btn-title]" class="bts-text w-200" value="" />
            </div>

            <div class="bts-img-selector">
                <input type="hidden" value="https://scontent-sin6-1.xx.fbcdn.net/v/t1.0-1/c32.0.148.148a/p148x148/138316091_101872231896837_4751573829277292643_n.png?_nc_cat=107&ccb=3&_nc_sid=1eb0c7&_nc_ohc=QhwzWHkG1L8AX-ZbiE_&_nc_ht=scontent-sin6-1.xx&_nc_tp=30&oh=b5ec1f8a6da8d4e2397cd99c64a2fe9e&oe=605C7EA7" name="beautiful_steps_settings[list][${nextIndex}][step][${i}][icon]">
                <button class="bts-btn-img" id="bts-btn-${nextIndex}-${i}">${
        translatedText.chooseImage
      }</button>
                <img id="bts-img-${nextIndex}-${i}" src="https://scontent-sin6-1.xx.fbcdn.net/v/t1.0-1/c32.0.148.148a/p148x148/138316091_101872231896837_4751573829277292643_n.png?_nc_cat=107&ccb=3&_nc_sid=1eb0c7&_nc_ohc=QhwzWHkG1L8AX-ZbiE_&_nc_ht=scontent-sin6-1.xx&_nc_tp=30&oh=b5ec1f8a6da8d4e2397cd99c64a2fe9e&oe=605C7EA7" alt="" class="bts-img">
            </div>
        </div>
      `);
    }

    // Bắt đầu cài đặt các thông tin của step
    const newStep = `
      <div class="bts-step">
        <div class="bts-flex bts-flex--center">
            <label class="bts-lb" for="beautiful_steps_settings[list][${nextIndex}][title]">${
      translatedText.stepTitle
    }</label>
            <input type="text" name="beautiful_steps_settings[list][${nextIndex}][title]" class="bts-text full-width max-w-500" value="" />
        </div>

        <div class="bts-flex bts-flex--center">
            <label class="bts-lb" for="beautiful_steps_settings[list][${nextIndex}][bg-color]">${
      translatedText.stepBgColor
    }</label>
            <input type="text" name="beautiful_steps_settings[list][${nextIndex}][bg-color]" class="bts-text w-100 bts-color-text" value="#E1EEF6" data-default-color="#E1EEF6"/>
        </div>

        <div class="bts-flex bts-flex--center">
            <label class="bts-lb" for="beautiful_steps_settings[list][${nextIndex}][icon-color]">${
      translatedText.stepIconColor
    }</label>
            <input type="text" name="beautiful_steps_settings[list][${nextIndex}][icon-color]" class="bts-text w-100 bts-color-text" value="#adcfe4" data-default-color="#adcfe4"/>
        </div>

        <div class="bts-guild-box">
          ${newItems.join("")}
        </div>
        </div>
      </div>
    `;

    if (!newStep) {
      alert(
        "Có lỗi xảy ra. Vui lòng liên hệ với admin hoặc phía nhà phát triển!"
      );
      return;
    }
    container.append(newStep);
    $(".bts-color-text").wpColorPicker();
  });
});
