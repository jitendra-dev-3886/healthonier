<style>
    /* Apply custom styles to the select element */
    .form-control {
        width: 100%;
        padding: 8px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        background-color: #fff;
        /* Set the background color */
        color: #333;
        /* Set the text color */
    }

    /* Style the options within the select element */
    .form-control option {
        font-size: 16px;
    }

    /* Apply custom styles when the select element is focused */
    .form-control:focus {
        outline: none;
        border-color: #66afe9;
        box-shadow: 0 0 5px rgba(102, 175, 233, 1);
    }

    /* Apply custom styles to selected option */
    .form-control option[selected] {
        background-color: #66afe9;
        color: #fff;
    }

</style>
<select name="group" class="form-control" onchange="updateGroup(this.value,{{$userId}})">
    @foreach ($options as $value => $label)
    <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>{{ $label }}</option>
    @endforeach
</select>
